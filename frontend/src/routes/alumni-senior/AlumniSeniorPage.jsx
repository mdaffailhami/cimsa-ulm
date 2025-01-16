import { css } from '@emotion/react';
import PageHeader from '../PageHeader';
import BlogSection from '../BlogSection';
import OfficialCardSection from '../OfficialCardSection';
import AlumniDistributionSection from './AlumniDistributionSection';
import LoadingIndicator from '../LoadingIndicator';
import { endpoint } from '../../configs';
import { useEffect, useState } from 'react';
import { setPageMeta } from '../../utils';

export default function AlumniSeniorPage() {
  setPageMeta(
    'Alumni & Senior - CIMSA ULM',
    'CIMSA ULM is forever thankful to those who have contributed their hearts, spirits, and time to making CIMSA ULM what it is today. This is a page dedicated to our alumni and seniors.'
  );

  const [pageData, setPageData] = useState(undefined);
  const [blog, setBlog] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/alumni-senior`);
        const res2 = await fetch(`${endpoint}/api/post?page=1&limit=3`);
        const data = await res.json();
        const data2 = await res2.json();

        if (!data && !data2) throw new Error('Error fetching data');

        setPageData(data);
        setBlog(data2);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!pageData || !blog) {
    return <LoadingIndicator />;
  }

  const { contents, contact } = pageData;

  return (
    <>
      <PageHeader
        title='Alumni & Senior'
        description={
          contents.find((x) => x.column === 'description').text_content
        }
      />
      <AlumniDistributionSection
        image={contents.find((x) => x.column === 'map-image').image_content}
      />
      <br />
      <br />
      <BlogSection posts={blog.data} />
      <br />
      <br />
      <OfficialCardSection
        header={
          <div
            data-aos='zoom-in'
            data-aos-duration='1200'
            data-aos-once='true'
            css={css`
              color: white;
              text-align: center;
              padding-top: 26px;
              margin-bottom: -8px;
            `}
          >
            <h3>Are You a CIMSA ULM Alumni or Senior?</h3>
            <h4 style={{ fontWeight: 'normal' }}>
              Contact us! We'd love to hear from you.
            </h4>
          </div>
        }
        period={contact.generation}
        position={contact.occupation}
        picture={contact.image}
        name={contact.name}
        email={contact.email}
        phone={contact.phone}
      />
    </>
  );
}
