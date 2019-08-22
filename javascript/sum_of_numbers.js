function GetSum( a,b )
{  
  return new Array((a > b ? (a-b):(b-a)) + 1)
  .fill()
  .map((_, i) => (a > b ? (i-a):(i+a)))
  .reduce((c,d) => c+d) * (a > b ? -1 : 1)
}