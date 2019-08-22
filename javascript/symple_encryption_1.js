function encrypt(text, n){
    if(n <= 0 || text == null) return text;
    else {
      str = [...text]
      .map((x, i) => [{index: i+1, value: x}])
      .reduce((acc, x) => acc.concat(x))
      .sort((a,b) => a.index % 2 -b.index % 2 || a.index - b.index)
      .map(a => a.value)
      .join("")
      return encrypt(str, n-1);
    }
  }
  
  function decrypt(encryptedText, n){
    if(n <= 0 || encryptedText == '' || encryptedText == null) return encryptedText;
    else {
      str = new Array(encryptedText.length)
      .fill()
      .map((_, i) => i+1)
      .sort((a,b) => a % 2 - b % 2 || a-b)
      .map((x, i) => [{index: x, value: encryptedText.charAt(i)}])
      .reduce((acc, x) => acc.concat(x))
      .sort((a,b) => a.index - b.index)
      .map(a => a.value)
      .join("")
      return decrypt(str, n - 1);
    }
}