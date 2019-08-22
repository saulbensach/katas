defmodule Solution do
    def is_very_even(number) do
        if number < 10, do: rem(number, 2) == 0, else: Integer.digits(number)|> Enum.sum |> is_very_even
    end
end