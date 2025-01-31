import { useEffect, useState } from 'react';
import PageHeader from '../../components/PageHeader';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';
import { setPageMeta } from '../../utils';
import ScosList from './ScosList';

export default function ScosPage() {
  setPageMeta(
    'The SCOs - CIMSA ULM',
    'We organize our work through six Standing Committees that represent focus areas of equal importance in order to maintain a balanced, holistic, and steady approach towards our targets and goals.'
  );

  const [pageData, setPageData] = useState(undefined);
  const [scos, setScos] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/scos`);
        const res2 = await fetch(`${endpoint}/api/committe`);
        const data = await res.json();
        const data2 = await res2.json();

        if (!data || !data2) throw new Error('Error fetching data');

        setPageData(data);
        setScos(data2.data);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!pageData || !scos) {
    return <LoadingPage />;
  }

  return (
    <>
      <PageHeader
        title='Standing Committees'
        description={
          <HtmlParser
            html={
              pageData.contents.find((x) => x.column === 'description')
                .text_content
            }
          />
        }
      />
      <hr style={{ color: 'red', borderWidth: '1px', opacity: '1' }} />
      <ScosList scos={scos} />
      <br />
    </>
  );
}
