import PageHeader from '../../components/PageHeader';
import OrganizationStructure from './OrganizationStructure';
import { setPageMeta } from '../../utils';
import { useEffect, useState } from 'react';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';

export default function OfficialsPage() {
  setPageMeta(
    'The Officials - CIMSA ULM',
    'Meet the officials of CIMSA ULM. We are a team of dedicated and passionate individuals who work together to achieve our goals and make a positive impact in our community.'
  );
  const [pageData, setPageData] = useState(undefined);
  const [officials, setOfficials] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/officials`);
        const res2 = await fetch(`${endpoint}/api/official`);
        const data = await res.json();
        const data2 = await res2.json();

        if (!data && !data2) throw new Error('Error fetching data');

        setPageData(data);
        setOfficials(data2.data);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!pageData) {
    return <LoadingPage />;
  }

  const { contents } = pageData;

  return (
    <>
      <PageHeader
        title='Meet the Officials'
        description={
          <HtmlParser
            html={contents.find((x) => x.column === 'description').text_content}
          />
        }
      />
      <OrganizationStructure officials={officials} />
    </>
  );
}
