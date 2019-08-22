#include <vector>

std::vector<int> countPositivesSumNegatives(std::vector<int> input){
    if(input.size() < 1) return {}; 
    unsigned int sum_pos, sum_neg;
    sum_pos = sum_neg = 0;
    for(std::vector<int>::size_type i = 0; i != input.size(); i++){
        if(input[i] <= 0){
        sum_neg += input[i];
        } else {
        sum_pos += 1;
        }
    }
    return {sum_pos, sum_neg};
}