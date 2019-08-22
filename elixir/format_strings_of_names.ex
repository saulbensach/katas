defmodule People do
    def list(people) do
        {first, last} = Enum.map(people, fn %{name: name} -> name end)
        |> Enum.split(Enum.count(people)-2)
        Enum.map(first, fn name -> name<>", " end) ++ List.insert_at(last, Enum.count(last)-1, " & ")
        |> List.to_string
        |> String.trim_leading(" & ")
    end
end