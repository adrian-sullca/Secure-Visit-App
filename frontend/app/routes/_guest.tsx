// _guest.tsx
import { Outlet, useRouteLoaderData } from "@remix-run/react";
import GuestHeader from "./../components/layout/GuestHeader";
import Footer from "./../components/layout/Footer";
export default function GuestLayout(): JSX.Element {
  const data = useRouteLoaderData("root");
  const lng = (data as { lng?: string })?.lng ?? "es";

  return (
    <>
      <GuestHeader lng={lng} />
      <main className="pt-28 pb-14 p-8 px-5 xs:px-10 sm:px-20 min-h-screen bg-[#f7f9fb]">
        <Outlet />
      </main>
      <Footer />
    </>
  );
}
