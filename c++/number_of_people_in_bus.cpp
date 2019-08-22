#include <utility>
#include <vector>

unsigned int number(const std::vector<std::pair<int, int>>& busStops){
    signed int num_ocupants = 0;
    
    for(int i = 0; i < busStops.size(); i++){
        num_ocupants += std::get<0>(busStops[i]) - std::get<1>(busStops[i]);
    }
    
    return num_ocupants;
}