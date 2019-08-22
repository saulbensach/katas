defmodule Sumfracts do
  
    def sum_fracts(lst) do
        if lst != [] do
        {n,d} = lst |> Enum.split(2) |> sum_fraction
        if rem(n,d) == 0, do: n, else: {n,d}
        else
            nil
        end
    end
    
    def sum_fraction({[fraction], []}), do: fraction

    def sum_fraction({[{n1,d1}, {n2, d2}], rest}) do
        d3 = div((d1 * d2), gcd(d1, d2))
        n3 = n1 * div(d3, d1) + n2 * div(d3,d2)
        common = gcd(n3, d3)
        d3 = div(d3,common)
        n3 = div(n3,common)
        [{n3, d3} | rest] |> Enum.split(2) |> sum_fraction
    end
    
    def gcd(a,0), do: abs(a)
    def gcd(a,b), do: gcd(b, rem(a,b))
    
end