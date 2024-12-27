import { css } from '@emotion/react';
import { Carousel, Container } from 'react-bootstrap';

export default function ProgramSection({ id, title, subtitle, body }) {
  return (
    <Container
      id={id}
      css={css`
        text-align: center;

        @media (max-width: 1199.98px) {
          width: 100%;
        }
        @media (min-width: 1200px) {
          width: 960px;
        }
      `}
    >
      <h2 style={{ color: 'red' }}>
        <b>{title}</b>
      </h2>
      <p style={{ marginBottom: '14px' }}>{subtitle}</p>
      <Carousel
        css={css`
          overflow: hidden;
          border-radius: 20px;

          @media (min-width: 992px) {
            border-radius: 24px;
          }
        `}
      >
        <Carousel.Item>
          <img
            css={css`
              width: 100%;
              object-fit: cover;
              height: 50vw;
              border-radius: 20px;

              @media (min-width: 992px) {
                height: 500px;
                border-radius: 24px;
              }
            `}
            src='https://avatars.githubusercontent.com/u/74972129?v=4'
          />
        </Carousel.Item>
        <Carousel.Item>
          <img
            css={css`
              width: 100%;
              object-fit: cover;
              height: 50vw;
              border-radius: 20px;

              @media (min-width: 992px) {
                height: 500px;
                border-radius: 24px;
              }
            `}
            src='https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
          />
        </Carousel.Item>
        <Carousel.Item>
          <img
            css={css`
              width: 100%;
              object-fit: cover;
              height: 50vw;
              border-radius: 20px;

              @media (min-width: 992px) {
                height: 500px;
                border-radius: 24px;
              }
            `}
            src='https://picsum.photos/800/400'
          />
        </Carousel.Item>
      </Carousel>
      <br />
      {body}
    </Container>
  );
}
