defmodule Challenge do
    def valid_braces(braces) do
        String.contains?(braces, ["()", "[]", "{}"]) && !String.contains?(braces, [")(", "}{", "]["])
    end
end