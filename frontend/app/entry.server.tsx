import { PassThrough } from "node:stream";
import { createReadableStreamFromReadable } from "@remix-run/node";
import type { EntryContext } from "@remix-run/node";
import { RemixServer } from "@remix-run/react";
import { isbot } from "isbot";
import { renderToPipeableStream } from "react-dom/server";

import i18next from "i18next";
import { initReactI18next, I18nextProvider } from "react-i18next";

import en from "./locales/en";
import es from "./locales/es";
import { i18n } from "./i18next.server";

const ABORT_DELAY = 5_000;

export default async function handleRequest(
  request: Request,
  responseStatusCode: number,
  responseHeaders: Headers,
  remixContext: EntryContext,
) {
  const lng = await i18n.getLocale(request);

  // eslint-disable-next-line import/no-named-as-default-member
  await i18next.use(initReactI18next).init({
    lng,
    fallbackLng: "es",
    supportedLngs: ["es", "en"],
    resources: {
      es: { translation: es },
      en: { translation: en },
    },
    defaultNS: "translation",
    interpolation: { escapeValue: false },
    react: { useSuspense: false },
  });

  const App = (
    <I18nextProvider i18n={i18next}>
      <RemixServer context={remixContext} url={request.url} abortDelay={ABORT_DELAY} />
    </I18nextProvider>
  );

  return isbot(request.headers.get("user-agent") || "")
    ? handleBotRequest(App, responseStatusCode, responseHeaders)
    : handleBrowserRequest(App, responseStatusCode, responseHeaders);
}

function handleBotRequest(
  jsx: JSX.Element,
  responseStatusCode: number,
  responseHeaders: Headers
) {
  return new Promise((resolve, reject) => {
    let shellRendered = false;
    const { pipe, abort } = renderToPipeableStream(jsx, {
      onAllReady() {
        shellRendered = true;
        const body = new PassThrough();
        const stream = createReadableStreamFromReadable(body);

        responseHeaders.set("Content-Type", "text/html");

        resolve(
          new Response(stream, {
            headers: responseHeaders,
            status: responseStatusCode,
          })
        );

        pipe(body);
      },
      onShellError(error: unknown) {
        reject(error);
      },
      onError(error: unknown) {
        responseStatusCode = 500;
        if (shellRendered) console.error(error);
      },
    });

    setTimeout(abort, ABORT_DELAY);
  });
}

function handleBrowserRequest(
  jsx: JSX.Element,
  responseStatusCode: number,
  responseHeaders: Headers
) {
  return new Promise((resolve, reject) => {
    let shellRendered = false;
    const { pipe, abort } = renderToPipeableStream(jsx, {
      onShellReady() {
        shellRendered = true;
        const body = new PassThrough();
        const stream = createReadableStreamFromReadable(body);

        responseHeaders.set("Content-Type", "text/html");

        resolve(
          new Response(stream, {
            headers: responseHeaders,
            status: responseStatusCode,
          })
        );

        pipe(body);
      },
      onShellError(error: unknown) {
        reject(error);
      },
      onError(error: unknown) {
        responseStatusCode = 500;
        if (shellRendered) console.error(error);
      },
    });

    setTimeout(abort, ABORT_DELAY);
  });
}
