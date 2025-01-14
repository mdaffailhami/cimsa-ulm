// export function instantlyScrollTo(){
//     setTimeout(() => {
//         window.scrollTo({ top: 0, behavior: 'instant' });
//       }, 0.3);
// }

export function scrollById(id) {
  // Detect hash in URL, if there is a hash then scroll to that section
  if (id) {
    const element = document.querySelector(id);

    if (element) {
      window.scrollTo(0, element.offsetTop - 80);
    }
  }
}

export function setPageMeta(title, description) {
  document.title = title;

  document.head.insertAdjacentHTML(
    'beforeend',
    `<meta name="description" content="${description}">`
  );

  document.head.insertAdjacentHTML(
    'beforeend',
    `<link rel="canonical" href="${window.location.href}">`
  );
}
