defmodule Pentabonacci do
 
    def count_odd_pentaFib(n) do
        pentaFib(n, [0,1,1,2,4], 1)
    end
    
    defp pentaFib(4, _list, count), do: count
    
    defp pentaFib(n, list, count) do
        list = Enum.take(list, -5)
        nextV = list |> Enum.sum()
        count = if rem(nextV, 2) != 0, do: count+1, else: count
        pentaFib(n-1, list ++ [nextV], count)
    end
  
end