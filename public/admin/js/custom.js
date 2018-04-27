/**
 * Funcion que cera y esconde los labels de error
 * @param {array} labels
 * @returns {undefined}
 */
function resetLabels(params) {
    for (i = 0; i < params.length; i++) {
        $(params[i]).html('');
        $(params[i]).css('display', 'none');
    }
}
