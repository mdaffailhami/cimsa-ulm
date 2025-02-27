export default function HtmlParser({ html }) {
  return <span dangerouslySetInnerHTML={{ __html: html }} />;
}
