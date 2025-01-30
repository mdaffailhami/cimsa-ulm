import { useParams } from 'react-router';
import { endpoint } from '../../../configs';
import { setPageMeta } from '../../../utils';
import LoadingIndicator from '../../LoadingIndicator';
import { useEffect, useState } from 'react';
import { css } from '@emotion/react';
import HeroSection from './HeroSection';
import { Container } from 'react-bootstrap';
import HtmlParser from '../../HtmlParser';

export default function ScoDetailPage() {
  const { name } = useParams();

  const [sco, setSco] = useState(undefined);

  useEffect(() => {
    document.title = 'SCO Detail - CIMSA ULM';

    (async () => {
      try {
        const res = await fetch(`${endpoint}/api/committe/${name}`);
        const data = await res.json();

        if (!data) throw new Error('Error fetching data');

        setPageMeta(`${data.data.name} - CIMSA ULM`, data.data.description);
        setSco(data.data);
      } catch (error) {
        alert(error);
      }
    })();
  }, []);

  if (!sco) return <LoadingIndicator />;

  return (
    <>
      <div
        css={css`
          /* background-image: url(${sco.background}); */
          background-image: url('https://froyonion.sgp1.digitaloceanspaces.com/images/blogdetail/3a67d8b8c68d4f067fe1dfee66e4f15947c8f4ae.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
          /* height: 100vh; */
          position: relative;
          display: flex;
          justify-content: center;
          color: ${sco.color};
        `}
      >
        <div
          css={css`
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(
              to top,
              ${sco.color},
              rgba(255, 255, 255, 0)
            );
          `}
        />
        <Container
          css={css`
            position: relative;
            z-index: 10;
            padding: 34px 0;
            display: flex;
            justify-content: center;
          `}
        >
          <HeroSection
            name={sco.name}
            description={<HtmlParser html={sco.long_description} />}
            images={sco.galleries.map((x) => x.url)}
          />
        </Container>
      </div>
    </>
  );
}
