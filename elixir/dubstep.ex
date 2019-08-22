defmodule SongDecoder do
    def decode_song(song) do
        song
        |> String.replace(~r/(WUB)+/, " ")
        |> String.strip
    end
end