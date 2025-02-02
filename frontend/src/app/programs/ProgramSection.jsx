import { css } from '@emotion/react';
import { Carousel, Container } from 'react-bootstrap';

export default function ProgramSection({
  id,
  title,
  // subtitle,
  body,
  images,
  endSection = true,
}) {
  return (
    <Container
      id={id}
      css={css`
        /* margin-bottom: ${!endSection ? '45px' : '0'}; */
        margin-bottom: 45px;
        text-align: center;

        @media (max-width: 1199.98px) {
          width: 100%;
        }
        @media (min-width: 1200px) {
          width: 960px;
        }
      `}
    >
      <h2
        data-aos='zoom-in'
        data-aos-once='true'
        data-aos-duration='1200'
        style={{ color: 'red', marginBottom: '14px' }}
      >
        <b>{title}</b>
      </h2>
      {/* <p
        data-aos='zoom-in-down'
        data-aos-once='true'
        data-aos-duration='1200'
        style={{ marginBottom: '14px' }}
      >
        {subtitle}
      </p> */}
      <Carousel
        data-aos='fade-up'
        data-aos-once='true'
        data-aos-duration='1200'
        css={css`
          overflow: hidden;
          border-radius: 20px;

          @media (min-width: 992px) {
            border-radius: 24px;
          }
        `}
      >
        {images.map((image, i) => (
          <Carousel.Item key={i}>
            <img
              css={css`
                width: 100%;
                object-fit: cover;
                height: 60vw;
                border-radius: 20px;

                @media (min-width: 992px) {
                  height: 520px;
                  border-radius: 24px;
                }
              `}
              src={image}
            />
          </Carousel.Item>
        ))}
      </Carousel>
      <br />
      <p>{body}</p>
      <br />
      {endSection && <hr />}
    </Container>
  );
}
