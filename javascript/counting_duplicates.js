function duplicateCount(text){
    let list = text.toLowerCase().split("").sort();
    let set = new Set();
    let current = null;
    for (let c of list){
      if(c != current){
        current = c;
      } else {
        set.add(c);
      }
    }
    return set.size;
}