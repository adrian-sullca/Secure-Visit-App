import { useState } from "react";
import {
  HamburgerMenuIcon,
  CloseHamburgerMenuIcon,
  SecureVisitLogoDark,
} from "./Icons";
import LanguageSwitcher from "./LanguageSwitcher";
import { useTranslation } from "react-i18next";

export default function HamburgerMenu({ lng }: { lng: string }) {
  const { t } = useTranslation();

  const [isOpen, setIsOpen] = useState(false);
  const toggleMenu = () => {
    setIsOpen(!isOpen);
  };

  return (
    <>
      <button className="flex" onClick={toggleMenu}>
        <HamburgerMenuIcon />
      </button>
      <div
        className={`fixed top-0 right-0 h-full w-64 bg-white flex flex-col place-content-between shadow-lg transform ${
          isOpen ? "translate-x-0" : "translate-x-full"
        } transition-transform  duration-300 ease-in-out z-50`}
      >
        <div className="flex justify-between px-5 py-[9px]">
          <LanguageSwitcher lng={lng} />
          <button onClick={toggleMenu}>
            <CloseHamburgerMenuIcon />
          </button>
        </div>
        <ul className="flex flex-col items-center">
          <li className="">{t("please_login")}</li>
        </ul>
        <div className="flex justify-between mx-auto py-[12px]">
          <SecureVisitLogoDark />
        </div>
      </div>
      {isOpen && (
        <div
          role="button"
          tabIndex={0}
          className="fixed inset-0 bg-black opacity-50 z-40 cursor-pointer"
          onClick={toggleMenu}
          onKeyDown={(e) => {
            if (e.key === "Enter" || e.key === " ") {
              toggleMenu();
            }
          }}
        />
      )}
    </>
  );
}