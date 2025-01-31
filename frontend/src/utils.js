// export function instantlyScrollTo(){
//     setTimeout(() => {
//         window.scrollTo({ top: 0, behavior: 'instant' });
//       }, 0.3);
// }

import { useEffect } from 'react';

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

export function getWebPaths() {
  return window.location.pathname.split('/').slice(1);
}

export function useScript(url) {
  useEffect(() => {
    const script = document.createElement('script');

    script.src = url;
    script.async = true;
    script.defer = true;

    document.body.appendChild(script);

    return () => {
      document.body.removeChild(script);
    };
  }, [url]);
}

export async function fetchJSON(url) {
  const response = await fetch(url);

  if (!response.ok) throw new Error(response.statusText);

  return await response.json();
}
