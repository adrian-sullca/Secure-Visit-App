import { Form, useNavigation } from "@remix-run/react";
import { FlagSpainIcon, FlagUnitedKingdomIcon } from "./Icons";
import { Dropdown } from "rsuite";
import { useState } from "react";

export default function LanguageSwitcher({ lng }: { lng: string }) {
  const navigation = useNavigation();
  const [selectedLang, setSelectedLang] = useState(lng);

  const handleSelect = (lang: string) => {
    setSelectedLang(lang);
    setTimeout(() => {
      (
        document.getElementById("language-form") as HTMLFormElement
      )?.requestSubmit();
    });
  };

  return (
    <Form method="post" id="language-form">
      <input type="hidden" name="lang" value={selectedLang} />
      <Dropdown
        title={selectedLang}
        icon={
          selectedLang === "es" ? <FlagSpainIcon /> : <FlagUnitedKingdomIcon />
        }
        disabled={navigation.state === "submitting"}
        onSelect={handleSelect}
      >
        <Dropdown.Item eventKey="es" icon={<FlagSpainIcon />}>
          es
        </Dropdown.Item>
        <Dropdown.Item eventKey="en" icon={<FlagUnitedKingdomIcon />}>
          en
        </Dropdown.Item>
      </Dropdown>
    </Form>
  );
}
