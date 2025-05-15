import { RemixI18Next } from "remix-i18next/server";
import { createCookie } from "@remix-run/node";
import en from "./locales/en";
import es from "./locales/es";

export const lngCookie = createCookie("lng", {
  sameSite: "lax",
  secure: process.env.NODE_ENV === "production",
  path: "/",
  maxAge: 365 * 24 * 60 * 60,
});

export const i18n = new RemixI18Next({
  detection: {
    order: ["cookie", "header"],
    cookie: lngCookie,
    fallbackLanguage: "es",
    supportedLanguages: ["es", "en"],
  },
  i18next: {
    resources: {
      es: { translation: es },
      en: { translation: en },
    },
    fallbackLng: "es",
    supportedLngs: ["es", "en"],
    defaultNS: "translation",
  },
});