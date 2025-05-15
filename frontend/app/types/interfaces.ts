// Validation Errors Type
export type ValidationErrors = Record<string, string>;

// Utils Interfaces
export interface TextFieldProps {
  labelText: string;
  id: string;
  inputType?: string;
  name: string;
  placeholder?: string;
  value?: string;
  handleChange?: (field: string, value: string) => void;
  validationError?: string;
}

export interface ValidationMessages {
  validationErrors?: ValidationErrors;
}
