import { json, LinksFunction, redirect } from "@remix-run/node";
import {
  Links,
  Meta,
  Outlet,
  Scripts,
  ScrollRestoration,
  useLoaderData,
  useRouteLoaderData,
} from "@remix-run/react";
import { i18n, lngCookie } from "./i18next.server";
import { useChangeLanguage } from "remix-i18next/react";
import 'rsuite/dist/rsuite.min.css';

import "./tailwind.css";

export async function loader({ request }: { request: Request }) {
  const lng = await i18n.getLocale(request);
  return json({ lng });
}

export const links: LinksFunction = () => [
  { rel: "preconnect", href: "https://fonts.googleapis.com" },
  {
    rel: "preconnect",
    href: "https://fonts.gstatic.com",
    crossOrigin: "anonymous",
  },
  {
    rel: "stylesheet",
    href: "https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap",
  },
];

export async function action({ request }: { request: Request }) {
  const formData = await request.formData();
  const lang = formData.get("lang");
  if (typeof lang === "string" && (lang === "en" || lang === "es")) {
    return redirect(request.url, {
      headers: {
        "Set-Cookie": await lngCookie.serialize(lang),
      },
    });
  }
  return null;
}

export function Layout({ children }: { children: React.ReactNode }) {
  const data = useRouteLoaderData<typeof loader>("root");
  const lng = data?.lng ?? "es";

  return (
    <html lang={lng}>
      <head>
        <meta charSet="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <Meta />
        <Links />
      </head>
      <body>
        {children}
        <ScrollRestoration />
        <Scripts />
      </body>
    </html>
  );
}

export default function App() {
  const { lng } = useLoaderData<typeof loader>();
  useChangeLanguage(lng);

  return <Outlet />;
}
