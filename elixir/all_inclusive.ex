defmodule Allinclusive do
  
    def contain_all_rots(strng, arr) do
        if strng == "", do: true, else: check_rots(strng, arr)
    end
    
    defp check_rots(strng, arr) do
        rotations = gen_rots(strng, [], strng)
        Enum.count(arr, fn x -> Enum.member?(rotations, x) end) == length(rotations)
    end  
    
    defp gen_rots(list), do: list

    defp gen_rots(strng, list, original) do
        if original == strng && list != [] do
        gen_rots(list)
        else
        new_strng = swap(strng)
        gen_rots(new_strng, [new_strng] ++ list, original)
        end
    end
    
    defp swap(strng) do
        {strng, last} = String.split_at(strng, -1)
        last<>strng
    end
    
end