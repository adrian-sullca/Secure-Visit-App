export default function Footer() {
  return (
    <footer className="bg-white text-black py-5">
      <div className="container mx-auto px-4 text-center">
        <p className="text-sm">
          &copy; {new Date().getFullYear()} Secure Visit. All rights reserved
        </p>
      </div>
    </footer>
  );
}
