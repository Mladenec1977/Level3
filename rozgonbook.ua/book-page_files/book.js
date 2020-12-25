var pathname = $(location).attr('pathname');
var bookIdPosition = pathname.lastIndexOf('/') + 1;
var isBookInUse = true;
var bookId = pathname.substring(bookIdPosition,pathname.length);


$('.btnBookID').click(function(event) {
    let result = new XMLHttpRequest();
    result.open("GET", "/?click=" + bookId, isBookInUse);
    result.send();
    {
        alert(
            "Книга свободна и ты можешь прийти за ней." +
            " Наш адрес: г. Кропивницкий, переулок Васильевский 10, 5 этаж." +
            " Лучше предварительно прозвонить и предупредить нас, чтоб " +
            " не попасть в неловкую ситуацию. Тел. 099 196 24 69"+
            " \n\n"+
            "******************\n"
        );
    }
});
