export default function HtmlParser({ html }) {
  return <div dangerouslySetInnerHTML={{ __html: html }} />;
}
