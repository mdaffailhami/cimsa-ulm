import { css } from '@emotion/react';
import PageHeader from '../../components/PageHeader';
import BlogSection from '../../components/BlogSection';
import ContactCardSection from '../../components/ContactCardSection';
import AlumniDistributionSection from './AlumniDistributionSection';
import LoadingPage from '../../components/LoadingPage';
import { endpoint } from '../../configs';
import { fetchJSON, setPageMeta } from '../../utils';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';

export default function AlumniSeniorPage() {
  setPageMeta(
    'Alumni & Senior - CIMSA ULM',
    'CIMSA ULM is forever thankful to those who have contributed their hearts, spirits, and time to making CIMSA ULM what it is today. This is a page dedicated to our alumni and seniors.'
  );

  const page = useSWR(`${endpoint}/api/page/alumni-senior`, fetchJSON);
  const posts = useSWR(`${endpoint}/api/post?page=1&limit=3`, fetchJSON);

  if (page.isLoading || posts.isLoading) {
    return <LoadingPage />;
  }

  if (page.error || posts.error) {
    return <LoadFailedPage />;
  }

  return (
    <>
      <PageHeader
        title='Alumni & Senior'
        description={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'description')
                .text_content
            }
          />
        }
      />
      <AlumniDistributionSection
        image={
          page.data.contents.find((x) => x.column === 'map-image').image_content
        }
      />
      <br />
      <br />
      <BlogSection posts={posts.data.data} />
      <br />
      <br />
      <ContactCardSection
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
        period={page.data.contact.generation}
        position={page.data.contact.occupation}
        picture={page.data.contact.image}
        name={page.data.contact.name}
        email={page.data.contact.email}
        phone={page.data.contact.phone}
      />
    </>
  );
}
