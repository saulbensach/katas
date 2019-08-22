function highAndLow(numbers){
    const format = (a,b) => {return ""+b+" "+a};
    arr = numbers
    .split(" ")
    .sort((a,b) => a-b);
    return arr.length <= 1 ? format(arr[0],arr[0]) : format(arr[0],arr[arr.length-1]) 
}