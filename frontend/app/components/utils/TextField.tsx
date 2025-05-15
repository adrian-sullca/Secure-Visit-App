import { Input } from "rsuite";
import { TextFieldProps } from "./../../types/interfaces";

export default function TextField({
  labelText,
  id,
  inputType = "text",
  name,
  placeholder = "",
  value,
  handleChange,
  validationError = "",
}: TextFieldProps) {
  return (
    <div className="flex flex-col gap-1">
      <label htmlFor={id}>{labelText}</label>
      <Input
        id={id}
        name={name}
        type={inputType}
        placeholder={placeholder}
        value={value}
        onChange={(val) => handleChange?.(name, val)}
      />
      {validationError ? (
        <span className="text-red-500 text-xs font-bold">
          {validationError}
        </span>
      ) : (
        ""
      )}
    </div>
  );
}
