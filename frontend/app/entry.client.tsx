import i18next from "i18next";
import { hydrateRoot } from "react-dom/client";
import { I18nextProvider, initReactI18next } from "react-i18next";
import { getInitialNamespaces } from "remix-i18next/client";
import { RemixBrowser } from "@remix-run/react";
import { startTransition, StrictMode } from "react";

import en from "./locales/en";
import es from "./locales/es";

const lang = document.documentElement.lang || "es";

// eslint-disable-next-line import/no-named-as-default-member
i18next
  .use(initReactI18next)
  .init({
    resources: {
      en: { translation: en },
      es: { translation: es },
    },
    lng: lang,
    fallbackLng: "es",
    supportedLngs: ["es", "en"],
    defaultNS: "translation",
    ns: getInitialNamespaces(),
    react: {
      useSuspense: false,
    },
    interpolation: {
      escapeValue: false,
    },
  })
  .then(() => {
    startTransition(() => {
      hydrateRoot(
        document,
        <StrictMode>
          <I18nextProvider i18n={i18next}>
            <RemixBrowser />
          </I18nextProvider>
        </StrictMode>
      );
    });
  });
