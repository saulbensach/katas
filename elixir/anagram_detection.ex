defmodule Anagram do
    def anagram?(a, b) do
        a = a |>String.upcase |> String.graphemes |> Enum.sort |> Enum.join("")
        b = b |>String.upcase |> String.graphemes |> Enum.sort |> Enum.join("")
        a == b
    end
end