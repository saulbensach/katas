function alphabetPosition(text) {
    const alphabet = [...'abcdefghijklmnopqrstuvwxyz'];
    return [...text.toLowerCase()]
    .map(c => alphabet.indexOf(c)+1)
    .filter(c => c != 0)
    .join(" ")
}