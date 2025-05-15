import { Button } from "rsuite";
import { Form, Link, useActionData } from "@remix-run/react";
import { ValidationMessages } from "./../../types/interfaces";
import TextField from "./../utils/TextField";
import { useTranslation } from "react-i18next";

export default function RegisterForm() {
  const { t } = useTranslation();
  const actionData = useActionData<ValidationMessages>();

  return (
    <Form method="post" className="flex flex-col gap-4 bg-white p-6 rounded-md">
      <input type="hidden" name="mode" value="register" />
      <h1 className="text-2xl font-bold">{t("register")}</h1>
      <TextField
        labelText={t("name")}
        id="name"
        name="name"
        placeholder={t("input_name_placeholder")}
        validationError={actionData?.validationErrors?.name}
      />

      <TextField
        labelText={t("email")}
        id="email"
        name="email"
        placeholder={t("input_email_placeholder")}
        validationError={actionData?.validationErrors?.email}
      />

      <TextField
        labelText={t("password")}
        id="password"
        name="password"
        placeholder="•••••••••"
        validationError={actionData?.validationErrors?.password}
      />

      <TextField
        labelText={t("confirm_password")}
        id="password-confirmation"
        name="password_confirmation"
        placeholder="•••••••••"
        validationError={actionData?.validationErrors?.password_confirmation}
      />

      <div className="space-y-3 mt-2">
        <Button appearance="primary" type="submit" className="w-full">
          {t("register")}
        </Button>

        <p>
          {t("already_have_an_account")}
          <Link className="pl-1 underline text-custom-blue" to={`?mode=login`}>
            {t("login_here")}
          </Link>
        </p>
      </div>
    </Form>
  );
}
