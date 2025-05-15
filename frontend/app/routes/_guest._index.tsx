// _guest._index.tsx
import { useTranslation } from "react-i18next";
import {
  ReportIcon,
  SearchIcon,
  StatsBarsIcon,
  UsersIcon,
} from "./../components/utils/Icons";
import LoginForm from "./../components/auth/LoginForm";
import RegisterForm from "./../components/auth/RegisterForm";
import { MetaFunction } from "@remix-run/node";
import { useSearchParams } from "@remix-run/react";

export const meta: MetaFunction = () => {
  return [{ title: "Secure Visit" }, { name: "description", content: "Home" }];
};

export default function HomePage() {
  const { t } = useTranslation();
  const [searchParams] = useSearchParams();
  const mode = searchParams.get("mode") || "login";

  return (
    <div className="grid md:grid-cols-[minmax(330px,510px),minmax(400px,1fr)] gap-12">
      <div>
        {mode === "login" && <LoginForm />}
        {mode === "register" && <RegisterForm />}
      </div>
      <div>
        <h1 className="mb-3 text-3xl font-bold text-gray-800 mb-1">
          {t("simplified_visitor_control")}
        </h1>
        <p className="mb-6 text-lg text-gray-600">
          {t("secure_visit_app_description")}
        </p>
        <div className="flex gap-4 flex-col">
          <div className="flex gap-2 items-center">
            <UsersIcon />
            <div className="">
              <p className="font-semibold text-lg">{t("item_title_one")}</p>
              <p className="text-gray-600 mt-0">{t("item_description_one")}</p>
            </div>
          </div>

          <div className="flex gap-2 items-center">
            <ReportIcon />
            <div>
              <p className="font-semibold text-lg">{t("item_title_two")}</p>
              <p className="text-gray-600 mt-0">{t("item_description_two")}</p>
            </div>
          </div>

          <div className="flex gap-2 items-center">
            <StatsBarsIcon />
            <div>
              <p className="font-semibold text-lg">{t("item_title_three")}</p>
              <p className="text-gray-600 mt-0">
                {t("item_description_three")}
              </p>
            </div>
          </div>

          <div className="flex gap-2 items-center">
            <SearchIcon />
            <div>
              <p className="font-semibold text-lg">{t("item_title_four")}</p>
              <p className="text-gray-600 mt-0">{t("item_description_four")}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
