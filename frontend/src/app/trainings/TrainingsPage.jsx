import { css } from '@emotion/react';
import ContactCardSection from '../../components/ContactCardSection';
import PageHeader from '../../components/PageHeader';
import OurTrainersSection from './OurTrainersSection';
import { setPageMeta } from '../../utils';
import { useEffect, useState } from 'react';
import { endpoint } from '../../configs';
import LoadingPage from '../../components/LoadingPage';
import HtmlParser from '../../components/HtmlParser';

export default function TrainingsPage() {
  setPageMeta(
    'Trainings - CIMSA ULM',
    'CIMSA has an established capacity building system where members may become trainers that will act as peer educators on various topics. These ‘trainings of trainers’ are conducted each year (some are held biennially), ensuring a steady production of trainers and a continuous stream of capacity buildings.'
  );

  const [pageData, setPageData] = useState(undefined);
  const [trainers, setTrainers] = useState(undefined);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/page/trainings`);
        const res2 = await fetch(`${endpoint}/api/training`);
        const data = await res.json();
        const data2 = await res2.json();

        if (!data && !data2) throw new Error('Error fetching data');

        setPageData(data);
        setTrainers(data2.data);
      } catch (err) {
        alert(err);
      }
    })();
  }, []);

  if (!pageData) {
    return <LoadingPage />;
  }

  const { contents, contact } = pageData;

  return (
    <>
      <PageHeader
        title='Our Trainings'
        description={
          <HtmlParser
            html={contents.find((x) => x.column === 'description').text_content}
          />
        }
      />
      <OurTrainersSection
        description={
          <HtmlParser
            html={
              contents.find((x) => x.column === 'trainers-description')
                .text_content
            }
          />
        }
        trainers={trainers}
      />
      <hr />
      <ContactCardSection
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
