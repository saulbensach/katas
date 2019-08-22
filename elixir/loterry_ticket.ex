defmodule LotteryTicket do
  
    def bingo(ticket, win) do
        if check_wins(ticket, 0) >= win, do: "Winner!", else: "Loser!"
    end
    
    defp check_wins([], wins), do: wins
    
    defp check_wins([[code, number] | rest], wins) do
        if code 
        |> String.graphemes 
        |> Enum.any?(fn x -> <<number::utf8>> == x end), 
        do: check_wins(rest, wins+1), else: check_wins(rest, wins)
    end
  
end