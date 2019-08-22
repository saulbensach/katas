defmodule FactDecomp do

    def decomp(n) do
        [next | list] = fact(n, [])
        custom_map(list, next, 1, []) |> Enum.join("")
    end
    
    defp fact(0, list), do: list |> Enum.sort

    defp fact(n, list) do
        res = factors_list(n,[], 2)
        fact(n-1, list ++ res)
    end
    
    defp custom_map([], uniq, times, result) do 
        result ++ [uniq]
    end
    
    defp custom_map([next | list], uniq, times ,result) do
        if next != uniq do
        res = cond do 
            times <= 1 -> [uniq, " * "]
            times -> [uniq, "^",times," * "]
        end
        custom_map(list, next, 1, result ++ res)
        else
        custom_map(list, uniq, times+1, result)
        end   
    end
    
    defp factors_list(n, factors, d) do
        if n > 1 do
        if rem(n,d) == 0 do
            factors_list(div(n,d), factors ++ [d], d)
        else
            factors_list(n, factors, d+1)
        end
        else
        factors
        end
    end
  
end