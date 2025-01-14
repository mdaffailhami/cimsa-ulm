import AboutUsSection from './AboutUsSection';
import Banner from './Banner';
import BlogSection from '../BlogSection';
import NumberOfThingsSection from './NumberOfThingsSection';
import QuoteSection from './QuoteSection';
import VisionMissionSection from './VisionMissionSection';
import { setPageMeta } from '../../utils';
import { useEffect, useState } from 'react';
import LoadingIndicator from '../LoadingIndicator';
import { endpoint } from '../../configs';

export default function HomePage() {
  setPageMeta(
    'CIMSA ULM',
    "Center for Indonesian Medical Students' Activities - Universitas Lambung Mangkurat"
  );

  const [contents, setContents] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/landing`);
        const data = await res.json();

        if (!data) throw new Error('Error fetching data');

        setContents(data.contents);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!contents) {
    return <LoadingIndicator />;
  }

  console.log(contents);

  return (
    <>
      <Banner
        title={contents.find((x) => x.column === 'banner-title').text_content}
        image={contents.find((x) => x.column === 'banner-image').image_content}
      />
      <br />
      <VisionMissionSection
        vision={contents.find((x) => x.column === 'vision').text_content}
        visionImage={
          contents.find((x) => x.column === 'vision-image').image_content
        }
        mission={contents.find((x) => x.column === 'mission').text_content}
        missionImage={
          contents.find((x) => x.column === 'mission-image').image_content
        }
      />
      <br />
      <hr />
      <NumberOfThingsSection
        establishedYear={
          contents.find((x) => x.column === 'established-year').text_content
        }
        activeMembers={
          contents.find((x) => x.column === 'active-members').text_content
        }
        successfulProjects={
          contents.find((x) => x.column === 'successful-projects').text_content
        }
        communityDevelopments={
          contents.find((x) => x.column === 'community-developments')
            .text_content
        }
      />
      <hr />
      <br />
      <AboutUsSection
        about={contents.find((x) => x.column === 'about-us').text_content}
      />
      <br />
      <hr />
      <br />
      <BlogSection totalPosts={6} />
      <br />
      <hr />
      <br />
      <QuoteSection
        quote={contents.find((x) => x.column === 'quote').text_content}
        author={contents.find((x) => x.column === 'quote-author').text_content}
        image={contents.find((x) => x.column === 'quote-image').image_content}
      />
    </>
  );
}
