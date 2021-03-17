export default function UrlExists(url, callback) {
    fetch(url, { method: 'head' })
    .then(function(status) {
      callback(status.ok);
    });
}