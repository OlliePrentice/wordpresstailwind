export default function getPathFromUrl(url) {
    return url.split(/[?#]/)[0];
}