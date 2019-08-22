defmodule Printererror do

    def printer_error(s) do
        string_to_list(s)
        |> check
        |> format(size_string(s))
    end
    
    defp format(count, length),  do: "#{length - count}/#{length}"
    defp valid_arr,              do: for c <- ?a..?m, do: [<<c::utf8>>]
    defp size_string(s),         do: String.length(s)
    defp string_to_list(s),      do: String.graphemes(s)
    defp count_repeated(arr, c), do: Enum.filter(arr, fn x -> [x] == c end) |> Enum.count
    defp check(arr),             do: Enum.map(valid_arr, fn x -> count_repeated(arr, x) end) |> Enum.sum

end