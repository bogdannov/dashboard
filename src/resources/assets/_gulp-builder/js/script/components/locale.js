export function getLocale() {
    try {
        return JSON.parse($('#data-locale').html());
    } catch (err){
        console.warn(err);
        console.warn('using locale "en" ');
        return {locale:'en'};
    }
}