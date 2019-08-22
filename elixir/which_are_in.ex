defmodule Whicharein do

    def in_array(array1, array2) do
        Enum.map(array1, fn x -> if Enum.map(array2, fn y -> y =~ x end)|> Enum.any?, do: x end) 
        |> Enum.filter(& !is_nil(&1)) 
        |> Enum.sort
    end
  
end