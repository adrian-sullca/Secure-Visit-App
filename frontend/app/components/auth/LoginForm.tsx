import { Button } from "rsuite";
import { Form, useNavigation, useActionData, Link } from "@remix-run/react";
import TextField from "./../utils/TextField";
import { useTranslation } from "react-i18next";
import { ValidationMessages } from "./../../types/interfaces";

export default function LoginForm() {
  const { t } = useTranslation();
  const actionData = useActionData<ValidationMessages>();
  const navigation = useNavigation();
  const isSubmitting = navigation.state !== "idle";

  return (
    <Form method="post" className="flex flex-col gap-4 bg-white p-6 rounded-md">
      <input type="hidden" name="mode" value="login" />
      <h1 className="text-2xl font-bold">{t("login")}</h1>

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

      <div className="space-y-3 mt-2">
        <Button
          appearance="primary"
          className="w-full"
          type="submit"
          loading={isSubmitting}
        >
          {t("login")}
        </Button>
        <p>
          {t("dont_have_an_account")}
          <Link
            className="pl-1 underline text-custom-blue"
            to={`?mode=register`}
          >
            {t("register_here")}
          </Link>
        </p>
      </div>
    </Form>
  );
}
