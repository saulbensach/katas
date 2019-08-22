int find_short(std::string str) {
  int num_chars = std::numeric_limits<int>::max();
  int char_count = 0;
  
  for(std::string::iterator it = str.begin(); it != str.end(); ++it){
    if(*it == ' ' || *it == '\0'){
      if(char_count < num_chars) num_chars = char_count;
      char_count = 0;
    } else {
      char_count++;
    }
  }
  if (num_chars == std::numeric_limits<int>::max()) return str.size();
  return num_chars;
}