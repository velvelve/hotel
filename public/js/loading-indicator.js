function showLoading() {
    $('#loading').removeClass('loading-hide');
    $('#loading').addClass('loading');
    $('#loading-content').addClass('loading-content');
}

function hideLoading() {
    $('#loading').addClass('loading-hide');
    $('#loading').removeClass('loading');
    $('#loading-content').removeClass('loading-content');
}