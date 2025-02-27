export default function HtmlParser({ html }) {
  return (
    <span className='ck-content' dangerouslySetInnerHTML={{ __html: html }} />
  );
}
