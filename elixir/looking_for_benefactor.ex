defmodule Benefactor do
  
    def new_avg(arr, newavg) do
        don = newavg * (Enum.count(arr) + 1) - Enum.sum(arr)
        if don > 0, do: Float.ceil(don + 0.0) |> trunc, else: raise ArgumentError, message: "Expected New Average is too low"
    end
  
end