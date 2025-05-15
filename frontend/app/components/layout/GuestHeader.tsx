import HamburgerMenu from "../utils/HamburgerMenu";
import { SecureVisitLogoDark } from "../utils/Icons";
// import LanguageSwitcher from "../utils/LanguageSwitcher";

export default function GuestHeader({ lng }: { lng: string }) {
  return (
    <header className="fixed w-full h-14 border-b z-50 bg-white">
      <nav className="text-black h-full">
        <ul className="flex justify-between items-center h-full px-6">
          <li>
            <SecureVisitLogoDark />
          </li>
          <li>
            <HamburgerMenu lng={lng} />
          </li>
        </ul>
      </nav>
    </header>
  );
}
